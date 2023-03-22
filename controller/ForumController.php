<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

class ForumController extends AbstractController implements ControllerInterface
{

    public function index()
    {


        $topicManager = new TopicManager();

        return [
            "view" => VIEW_DIR . "forum/listTopics.php",
            "data" => [
                "topics" => $topicManager->findAll(["datecreation", "DESC"])
            ]
        ];
    }

    public function listTopics()
    {
        $topicManager = new TopicManager();


        return [
            "view" => VIEW_DIR . "forum/listTopics.php",
            "data" => [
                "topics" => $topicManager->findAll(["datecreation", "DESC"]) //,


            ]
        ];
    }
    public function listTopicsByCategory($id)
    {

        $topicManager = new TopicManager();

        return [
            "view" => VIEW_DIR . "forum/listTopics.php",
            "data" => [
                "topics" => $topicManager->findTopicsByCategory($id, ["dateCreation", "DESC"])
            ]
        ];
    }

    public function listPostsByTopic($id)
    {

        $postManager = new PostManager();
        $topicManager = new TopicManager();

        return [
            "view" => VIEW_DIR . "forum/listPosts.php",
            "data" => [
                "posts" => $postManager->findPostsByTopic($id, ["dateCreation", "DESC"]),
                "topic" => $topicManager->findOneById($id)
            ]
        ];
    }

    public function closeOpenTopic($id)
    {

        $topicManager = new TopicManager();

        $topic = $topicManager->findOneById($id);
        echo ($topic->getLocked());

        if ($topic->getLocked() == '0') {
            $topic->setLocked('1');
        } else {
            $topic->setLocked('0');
        }
        echo ($topic->getLocked());
        // die();
        $topicManager->updateTopicStatus($id, $topic->getLocked());

        $this->redirectTo('forum', 'listTopics');
    }



    public function listCategories()
    {
        $categoryManager = new CategoryManager();
        return [
            "view" => VIEW_DIR . "forum/listCategiories.php",
            "data" => [
                "categories" => $categoryManager->findAll(["categoryName", "DESC"])
            ]
        ];
    }

    public function topicForm()
    {
        $categoryManager = new CategoryManager();
        return [
            "view" => VIEW_DIR . "forum/topicForm.php",
            "data" => [
                "categories" => $categoryManager->findAll(["categoryName", "DESC"])

            ]
        ];
    }

    // partie ajout id utilisateur 
    public function addTopic()
    {
        if (isset($_POST['submit'])) {
            $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
            echo ("category" . $category);

            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
            $sujet = filter_input(INPUT_POST, 'sujet', FILTER_SANITIZE_SPECIAL_CHARS);
            $user = 1;

            $topicManager = new TopicManager;
            $topicManager->addTopic($title, $sujet, $category, $user);

            $this->redirectTo('forum', 'listTopics');

            // return [
            //     "view" => VIEW_DIR . "forum/listTopics.php",
            //     "data" => [
            //         "topics" => $topicManager->findAll(["dateCreation", "DESC"])
            //     ]
            // ];

        }
    }

    //edittopic avec id du topic 

    public function editTopicForm($id)
    {
        //topic find by id 
        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        return [
            "view" => VIEW_DIR . "forum/editTopicForm.php",
            "data" => [
                "categories" => $categoryManager->findAll(["categoryName", "DESC"]),
                "topic" => $topicManager->findOneById($id)

            ]
        ];
    }

    public function modifyTopic($id)
    {
        //topic find by id 
        $topicManager = new TopicManager();
        $user = 1; //lire session user 

        // if (isset($_GET['id'])) {
        //     $id = $_GET['id'];
        // }

        //get from variable 
        $idTopic = $id;



        if (isset($_POST['submit'])) {
            $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
            echo ("category" . $category);

            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
            $sujet = filter_input(INPUT_POST, 'sujet', FILTER_SANITIZE_SPECIAL_CHARS);
            $user = 1;
            // todo update topic 
            $topicManager->updateTopic($idTopic, $title, $sujet, $category, $user);


            $this->redirectTo('forum', 'listTopics');
        }
    }
}
