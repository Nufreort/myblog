<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

//----------------- POST ---------------//

function listPosts()
	{
		$postManager = new PostManager();

		$posts = $postManager->getPosts();

        $page = 'view/frontend/listPostsView.php';
        require('view/template.php');

	}

function listPostsVisitor()
	{
		$postManager = new PostManager();

		$posts = $postManager->getPosts();

        $page = 'view/frontend/listPostsVisitor.php';
        require('view/template.php');

	}

function post()
	{
		$postManager = new PostManager();
		$commentManager = new CommentManager();


		$post = $postManager->getPost($_GET['id']);
		$comments = $commentManager-> getComments($_GET['id']);

		$page = 'view/frontend/postView.php';
		require('view/template.php');
	}

function postVisitor()
	{
		$postManager = new PostManager();
		$commentManager = new CommentManager();


		$post = $postManager->getPost($_GET['id']);
		$comments = $commentManager-> getComments($_GET['id']);

        $page = 'view/frontend/postViewVisitor.php';
        require('view/template.php');
	}

//----------------- COMMENT ---------------//

function addComment($postId, $author, $content)
	{
		$commentManager = new CommmentManager();

		$affectedLines = $commentManager->postComment($postId, $author, $content);

		if ($affectedLines === false)
			{
				die('Impossible d\'ajouter le commentaire !');
			}
		else
			{
				header('Location: index.php?action=post&id=' .$postId);
			}
	}

function updateComment($commentId, $commentContent)
	{
		$commentManager = new CommentManager();
		$dataComment = $commentManager->editComment($commentId, $commentContent);

		if ($dataComment === false)
			{
				die('Impossible de modifier le commentaire.');
			}
		else
			{
				header('Location:index.php');
			}
	}

//----------------- USER ---------------//

function addUser($name, $first_name, $email, $password)
	{
		$userManager = new UserManager();
		$dataUser = $userManager->subUser($name, $first_name, $email, $password);

		if ($dataUser === false)
			{
				die('Impossible de s\'inscrire ! <br /> Veuillez vérifier les informations saisies ou changer d\'email.');
			}
		else
			{
				header('Location: view/memberarea/signIn_done.php');
			}
	}

function joinUser($email)
	{
		$userManager = new UserManager();
		$userManager->connexionUser($email);
	}

//----------------- NAVIGATION ---------------//

	function signIn()
		{
            $page = 'view/memberarea/signIn.php';
            require('view/template.php');
		}

	function signUp()
		{
            $page = 'view/memberarea/signUp.php';
            require('view/template.php');
		}

	function leave()
		{
            $page = 'view/memberarea/leave.php';
            require('view/template.php');
		}
function joinUser_done()
		{
            $page = 'view/memberarea/signUp_done.php';
            require('view/template.php');
		}
function error()
		{
            $page = 'view/errorPage.php';
            require('view/template.php');
		}

	function home()
		{
            $page = 'view/presentation.php';
            require('view/template.php');
		}
