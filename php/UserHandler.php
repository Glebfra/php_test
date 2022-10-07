<?php
require 'Database.php';

class UserHandler extends Database
{
    public function addUser($name, $lastname)
    {
        $this->executeSql(sprintf('INSERT INTO db_name.user SET name="%s", lastname="%s"', $name, $lastname));
    }

    public function addArticle($userId, $label, $text)
    {
        $this->executeSql(sprintf('INSERT INTO db_name.article SET userId="%s", label="%s", text="%s"', $userId, $label, $text));
    }

    public function getUsers()
    {
        $output = array('users'=>array());
        $users = $this->executeSql('SELECT * FROM db_name.user');
        if (mysqli_num_rows($users) > 0) {
            while ($row = mysqli_fetch_assoc($users)){
                $output['users'][] = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'lastname' => $row['lastname']
                );
            }
        }
        return json_encode($output);
    }

    public function getUserArticles($userId)
    {
        $output = array('articles'=>array());
        $user_articles = $this->executeSql(sprintf('SELECT * FROM db_name.article WHERE userId=%d', $userId));
        if (mysqli_num_rows($user_articles) > 0) {
            while ($row = mysqli_fetch_assoc($user_articles)){
                $output['articles'][] = array(
                    'id'=>$row['id'],
                    'label'=>$row['label'],
                    'text'=>$row['text']
                );
            }
        }
        return json_encode($output);
    }
}
