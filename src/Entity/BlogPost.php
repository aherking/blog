<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlogPostRepository")
 */
class BlogPost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string")
     */
    private $tags;

    /**
     * @ORM\Column(type="integer")
     */
    private $userID;

    public function getId() {
      $this->id;
    }

    public function getName() {
      $this->name;
    }

    public function getContent() {
      $this->content;
    }

    public function getTags() {
      $this->tags;
    }

    public function getUserID() {
      $this->userID;
    }

    public function setId() {
      $this->id = $id;
    }

    public function setName($name) {
      $this->name = $name;
    }

    public function setContent($content) {
      $this->content = $content;
    }

    public function setTags($tags) {
      $this->tags = $tags;
    }

    public function setUserID($userID) {
      $this->userID = $userID;
    }



}
