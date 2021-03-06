<?php

namespace Bazzd\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Post
 *
 * @ORM\Table(name="posts")
 * @ORM\Entity(repositoryClass="Bazzd\BlogBundle\Entity\PostRepository")
 */
class Post
{
    /**
     * @var Author 
     * 
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="posts")
     * @ORM\JoinColumn(name="authorID", referencedColumnName="id")
     */
    private $author;



    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50)
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "The title must be at least {{ limit }} characters long",
     *      maxMessage = "The title cannot be longer than {{ limit }} characters long"
     * )
     */
    private $title;

    /**
     * @var \Text
     *
     * @ORM\Column(name="message", type="text")
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 10,
     *      max = 1000,
     *      minMessage = "The message must be at least {{ limit }} characters long",
     *      maxMessage = "The message cannot be longer than {{ limit }} characters long"
     * )

     */
    private $message;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="stamp", type="datetime")
     *
     * Hierdoor krijgt stamp de waarde "nu"
     * @ORM\Version
     *
     */
    private $stamp;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Post
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set stamp
     *
     * @param \DateTime $stamp
     * @return Post
     */
    public function setStamp($stamp)
    {
        $this->stamp = $stamp;

        return $this;
    }

    /**
     * Get stamp
     *
     * @return \DateTime 
     */
    public function getStamp()
    {
        return $this->stamp;
    }

    /**
     * Set author
     *
     * @param \Bazzd\BlogBundle\Entity\Author $author
     * @return Post
     */
    public function setAuthor(\Bazzd\BlogBundle\Entity\Author $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Bazzd\BlogBundle\Entity\Author 
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
