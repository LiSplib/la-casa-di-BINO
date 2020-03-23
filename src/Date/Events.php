<?php

namespace Date;

class Events {

    private $pdo;

    public function __construct(\PDO $pdo) {

        $this->pdo = $pdo;
        
    }

    public function getEventsBetween ( \DateTime $start, \DateTime $end): array {
        $sql = "SELECT * FROM events WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}'";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll();
        return $results;
    }

    public function getEventsBetweenByDay ( \DateTime $start, \DateTime $end) : array {
        $events = $this->getEventsBetween($start, $end);
        $days = [];
        foreach($events as $event) {
            $date = explode(' ', $event['start'])[0];
            if (!isset($days[$date])){
                $days[$date] = [$event];
            }else {
                $days[$date][] = $event;
            }
        }
        return $days; 
    }

    public function find (int $id): Event {
        require 'Event.php';
        $statement = $this->pdo->query("SELECT * FROM events WHERE id = $id LIMIT 1");
        $statement->setFetchMode(\PDO::FETCH_CLASS, Event::class);
        $result = $statement->fetch();
        if ($result === false) {
            throw new \Exception('Aucun résultat n\'a été trouvé');
        }
        return $result;
    }

    public function hydrate (Event $event, array $data) {
        $event->setTitle($data['title']);
        $event->setContent($data['content']);
        $event->setStart(\DateTime::createFromFormat('Y-m-d H:i', $data['date'] . ' ' . $data['start'])->format('Y-m-d H:i:s'));
        $event->setEnd(\DateTime::createFromFormat('Y-m-d H:i', $data['date'] . ' ' . $data['end'])->format('Y-m-d H:i:s'));
        $event->setPhoto($data['photo']);
        $event->setUrl($data['url']);
        return $event;
    }

    public function create(Event $event): bool {
        $statement = $this->pdo->prepare('INSERT INTO events (title, content, start, end, photo, url) VALUES (?, ?, ?, ?, ?, ?)');
        return $statement->execute([
            $event->getTitle(),
            $event->getContent(),
            $event->getStart()->format('Y-m-d H:i:s'),
            $event->getEnd()->format('Y-m-d H:i:s'),
            $event->getPhoto(),
            $event->getUrl()
        ]);
    }

    public function update(Event $event): bool {
        $statement = $this->pdo->prepare('UPDATE events SET title = ?, content = ?, start = ?, end = ? , photo = ?, url = ? WHERE id = ?');
        return $statement->execute([
            $event->getTitle(),
            $event->getContent(),
            $event->getStart()->format('Y-m-d H:i:s'),
            $event->getEnd()->format('Y-m-d H:i:s'),
            $event->getPhoto(),
            $event->getId(),
            $event->getUrl()
        ]);
    }

    public function delete(int $id) {
        $statement = $this->pdo->prepare('DELETE FROM events WHERE events.id = :id');
        $statement->bindParam(':id', $id );
        return $statement->execute();
    }
}