<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';
checkSession();

function debug($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function getParams() {
  if (empty($_REQUEST)) {
    return false;
  }

  return $_REQUEST;
}

function login() {
  $params = getParams();
  if($params) {
    if ($params['password1'] === $params['password2']) {
      $_SESSION['email'] = $params['email'];
      $_SESSION['time'] = time();
      setcookie('test_cookie', time());
      $_SESSION['messages'] = [
        [
          'type' => 'success',
          'message' => 'You have log in successfully! Your email "'. $params['email'] . '"'
        ]
      ];

      header ('Location: /');
      die();
    }
    $_SESSION['messages'] = [
      [
        'type' => 'danger',
        'message' => 'Sorry, your passwords did not match! Please enter correct passwords.'
      ]
    ];
  }
}

function unLogin() {
  unset($_SESSION['email']);
  unset($_SESSION['time']);
  unset($_COOKIE['test_cookie']);
  header('Location: /');
  die();
}

function checkSession() {
  if (empty($_SESSION['email'])) {
    return;
  }
    $sessionTime = 60;
    $currentTime = time();
//    $timeToLogout = $sessionTime - ($currentTime - $_SESSION['time']);
 /* $_SESSION['messages'] = [
    [
      'type' => 'info',
      'message' => 'Your session will finished after ' . $timeToLogout . ' seconds!'
    ]
  ];*/
  if ($currentTime - $_SESSION['time'] > $sessionTime) {
    unLogin();
  }
}

function getSourceContent($fileName) {
  return file_get_contents($fileName);
}

function getSourceData($fileName) {
  $fileContent = getSourceContent($fileName);
  return $data = json_decode($fileContent, true);
}

function getMessages() {
  if (empty($_SESSION['messages'])) {
    return '';
  }
  $templateFile = './templates/content/messages/message.html';
  $messageTemplate = getSourceContent($templateFile);
  $messageTemplateHtml = '';
  foreach ($_SESSION['messages'] as $message) {
    $tmpTemplate = $messageTemplate;
    $tmpTemplate = str_replace('{{type}}', $message['type'], $tmpTemplate);
    $tmpTemplate = str_replace('{{message}}', $message['message'], $tmpTemplate);
    $messageTemplateHtml .= $tmpTemplate;
  }
  unset($_SESSION['messages']);

  return $messageTemplateHtml;
}

function getHeader($sourceData) {
  $templateFile = './templates/header/header.html';
  $template = getSourceContent($templateFile);
  $template = str_replace('{{title}}', $sourceData['title'], $template);
  $navigation = getNavigation();
  $template = str_replace('{{navigation}}', $navigation, $template);
  $messages = getMessages();
  $template = str_replace('{{messages}}', $messages, $template);

  return $template;
}

function getNavigation() {
  $navTemplateFile = './templates/navigation/navigation.html';
  $navigationTemplate = getSourceContent($navTemplateFile);

  $linkTemplateFile = './templates/navigation/link.html';
  $linkTemplate = getSourceContent($linkTemplateFile);

  $sourceData = './source/navigation_links.json';
  $data = getSourceData($sourceData);

  if (empty($data)) {
    return '';
  }

  $links = $data['links'];
  $linksHtml = '';

  $isLogin = !empty($_SESSION['email']) ? true : false;
  $i = 1;
  foreach ($links as $key => $link) {
    if ($isLogin && $key === 'link_3') {
      continue;
    } elseif (!$isLogin && $key === 'link_4') {
      continue;
    }
    $linkTemplateHtml = $linkTemplate;
    $linkTemplateHtml = str_replace('{{href}}', $link['href'], $linkTemplateHtml);
    $linkTemplateHtml = str_replace('{{title}}', $link['title'], $linkTemplateHtml);
    $i++;
    $linksHtml .= $linkTemplateHtml;
  }
  $navigationTemplate = str_replace('{{links}}', $linksHtml, $navigationTemplate);
  return $navigationTemplate;
}

function getMainContent($data, $template = 'home/index') {
  $templateFile = './templates/content/'. $template . '.html';
  $mainTemplate = getSourceContent($templateFile);
  $mainTemplate = str_replace('{{title}}', $data['title'], $mainTemplate);
  $mainTemplate = str_replace('{{description}}', $data['description'], $mainTemplate);
  $mainTemplate = str_replace('{{additional}}', $data['additional'], $mainTemplate);
  $pageContent = $data['content'];
  if (empty($pageContent)) {
    return $mainTemplate;
  }

  if ($template === 'home/index') {
    $sliderTemplateFile = './templates/content/home/slider_link.html';
    $sliderTemplate = getSourceContent($sliderTemplateFile);

    $slider = '';
    $i = 1;
    foreach ($pageContent['slider'] as $slide) {
      $sliderHtml = $sliderTemplate;
      $active = $i == 1 ? 'active' : '';
      $sliderHtml = str_replace('{{active}}', $active, $sliderHtml);
      $sliderHtml = str_replace('{{src}}', IMAGES_PATH . $slide['src'], $sliderHtml);
      $sliderHtml = str_replace('{{alt}}', $slide['alt'], $sliderHtml);
      $slider .= $sliderHtml;
      $i++;
    }
    $mainTemplate = str_replace('{{slider content}}', $slider, $mainTemplate);
    $loginFile = './templates/content/login/login.html';
    if (file_exists($loginFile)) {
      $loginTemplate = getSourceContent($loginFile);
      $mainTemplate = str_replace('{{login}}', $loginTemplate, $mainTemplate);
    } else {
      $mainTemplate = str_replace('{{login}}', '', $mainTemplate);
    }
  }

  if ($template === 'articles/article') {
    $articlesPageFile = './templates/content/articles/articles-page.html';
    $articlesPageTemplate = getSourceContent($articlesPageFile);

    $articlesFileName = $templateFile;
    $articlesTemplate = getSourceContent($articlesFileName);

    $articles = '';
    foreach ($pageContent['articles'] as $article) {
      $articlesHtml = $articlesTemplate;
      $articlesHtml = str_replace('{{title}}', $article['title'], $articlesHtml);
      $articlesHtml = str_replace('{{description}}', $article['description'], $articlesHtml);
      $articlesHtml = str_replace('{{text}}', $article['text'], $articlesHtml);
      $articlesHtml = str_replace('{{img}}', $article['img'], $articlesHtml);
      $articles .= $articlesHtml;
    }
    $articlesPageTemplate = str_replace('{{articles}}', $articles, $articlesPageTemplate);
    return $articlesPageTemplate;
  }

  if ($template === 'login/login') {
    $loginFileName = $templateFile;
    return getSourceContent($loginFileName);
  }

  return $mainTemplate;
}

function getFooter($sourceData) {

}