<?php
require_once '../src/bootstrap.php';

use Date\{
    Events,
    Month
};

$pdo = get_pdo();
?>



<?php
    $events = new Events($pdo);
    $month = new Month($_GET['month'] ?? null, $_GET['year'] ?? null); 
    $start = $month->getStartingDay();
    $start = $start->format('N') === '1' ? $start : $month->getStartingDay()->modify('last monday');
    $weeks = $month->getWeeks();
    $end = (clone $start)->modify('+' . (6 + 7 * ($weeks -1)) . 'days');
    $events = $events->getEventsBetweenByDay($start, $end);
    render('header');

    if(isset($_SESSION['auth'])): ?>
        <div class="container-fluid text-white">
            <h3 class="mt-5">Bienvenue <?= $_SESSION['username'] ?></h3>
        </div>
    <?php endif; ?>

        <div class="jumbotron jumbotron-fluid text-center text-white bg-dark">
            <div class="container-fluid">
                <div class="d-flex flex-row align-items center justify-content-between mx-sm-3">
                    <h1><?= $month->toString(); ?></h1>
                    <div>
                        <a href="index.php?month=<?= $month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year; ?>" class="btn btn-info">&lt;</a>
                        <a href="index.php?month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year; ?>" class="btn btn-info">&gt;</a>
                    </div>
                </div>
                <table class="calendar__table calendar__table--<?= $weeks; ?>weeks">
                    <?php for ($i = 0; $i < $weeks; $i++): ?>
                        <tr>
                            <?php foreach($month->days as $k => $day): 
                                $date = (clone $start)->modify("+" . ($k + $i * 7) . "days");
                                $eventsForDay = $events[$date->format('Y-m-d')] ?? [];
                                $isToday = date('Y-m-d') === $date->format('Y-m-d');
                            ?>
                            <td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth'; ?> <?= $isToday ? 'is-today' : ''; ?>">
                                <?php if ($i === 0): ?>
                                    <div class="calendar__weekday">
                                        <?= $day; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($_SESSION['auth'])): ?>
                                    <a class="calendar__day" href="add.php?date=<?= $date->format('Y-m-d'); ?>">
                                        <?= $date->format('d'); ?>
                                    </a>
                                    <?php else: ?><?= $date->format('d'); ?>
                                <?php endif; ?>
                                <?php foreach($eventsForDay as $event): ?>
                                    <div class="calendar__event">
                                        <?php if (isset($_SESSION['auth'])): ?>
                                            <?= (new DateTime($event['start']))->format('H:i') ?> - 
                                            <a href="edit.php?id=<?= $event['id']; ?>"><?= h($event['title']); ?></a>
                                            <?php else: ?><a href="currentEvent.php?id=<?= $event['id']; ?>"><?= h($event['title']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endfor; ?>
                </table>
            </div>
        </div>
<?php render('footer'); ?>