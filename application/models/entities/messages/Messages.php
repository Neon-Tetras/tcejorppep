<?php
namespace models\entities\messages;
use models\entities\User;
use Doctrine\ORM\Mapping as ORM;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Messages
 *
 * @author NeonTetras
 * @ORM\Table (name="messages")
 * @ORM\Entity (repositoryClass="MessageRepository")
 */
class Messages {
    
    /**
     * @ORM\Column (type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;
    /**
     * @ORM\Column (type="text", options={"customSchemaOptions"={"collate"="utf8mb4_unicode_ci"}})
     * @var string
     * 
     */
    protected $message;
    
   
    
    /**
     * @ORM\Column (type="string", length=250)
     * @var string
     */
    protected $image;
    
    /**
     * @ORM\Column (type="string", length=250)
     * @var string
     */
    protected $video;
    
    
        /**
     * @ORM\Column (type="string", length=250)
     * @var string
     */
    protected $document;
    
     
    
    
       
    /**
     * @ORM\ManyToOne(targetEntity="models\entities\User", inversedBy="messages")
     * @var User
     */
    protected $user;
     /**
     * @ORM\ManyToOne(targetEntity="Conversations", inversedBy="messages")
     * @var Conversation
     */
    protected $conversation;
    
   
    
   


    /**
     * @ORM\Column (type="datetimetz")
     * 
     * @var DateTime
     */
    protected $date;
    
    public function getId() {
        return $this->id;
    }

    public function getMessage() {
        return $this->message;
    }


    public function getImage() {
        return $this->image;
    }

    public function getVideo() {
        return $this->video;
    }

    public function getAudio() {
        return $this->audio;
    }

    public function getDocument() {
        return $this->document;
    }

   

   

    public function getUser(): User {
        return $this->user;
    }

   

    public function setId($id) {
        $this->id = $id;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

   
    public function setImage($image) {
        $this->image = $image;
    }

    public function setVideo($video) {
        $this->video = $video;
    }

    public function setAudio($audio) {
        $this->audio = $audio;
    }

    public function setDocument($document) {
        $this->document = $document;
    }

    public function setThumbnail($thumbnail) {
        $this->thumbnail = $thumbnail;
    }

   
    public function setUser(User $user) {
        $this->user = $user;
        $user->assignToMessage($this);
    }

    public function getDate(): DateTime {
        return $this->date;
    }

    public function setDate(DateTime $date) {
        $this->date = $date;
    }
    
    public function getConversation(){
        return $this->conversation;
    }

    public function setConversation(Conversation $conversation) {
        $this->conversation = $conversation;
        $conversation->setMessages($this);
    }
    
   


}
