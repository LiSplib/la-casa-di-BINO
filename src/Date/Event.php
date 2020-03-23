<?php

namespace Date;

class Event{

    private $id;

    private $title;

    private $content;

    private $start;

    private $end;

    private $photo;

    private $url;


    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Get the value of content
     */ 
    public function getContent(): string
    {
        return $this->content ?? '';
    }

    /**
     * Get the value of start
     */ 
    public function getStart(): \DateTime
    {
        return new \Datetime($this->start);
    }

    /**
     * Get the value of end
     */ 
    public function getEnd(): \DateTime
    {
        return new \Datetime($this->end);
    }


    /**
     * Get the value of photo
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle(string $title)
    {
        $this->title = $title;

        // return $this;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent(string $content)
    {
        $this->content = $content;

        // return $this;
    }

    /**
     * Set the value of start
     *
     * @return  self
     */ 
    public function setStart(string $start)
    {
        $this->start = $start;

        // return $this;
    }

    /**
     * Set the value of end
     *
     * @return  self
     */ 
    public function setEnd(string $end)
    {
        $this->end = $end;

        // return $this;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setPhoto(string $photo)
    {
        $this->photo = $photo;

        // return $this;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }
}