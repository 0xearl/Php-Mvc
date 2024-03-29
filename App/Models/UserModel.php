<?php 

namespace App\Models;

use App\Db;

class UserModel
{
    protected $db;

    function __construct( )
    {
        $db_instance = Db::getInstance();
        $this->db = $db_instance->getConnection();

        return $this;
    }
    public function all()
    {
       $users = $this->db->query('SELECT * FROM users');

       return $users;
    }

    public function find( $id )
    {
        $statement = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $statement->execute(['id' => $id]);
        $user = $statement->fetch();

        return $user;
    }

    public function create( $data )
    {
        $new_user = $this->db->prepare('INSERT INTO users (name, password) VALUES (:name, :password)');
        $new_user = $new_user->execute(['name' => $data['name'], 'password' => password_hash( $data['password'], PASSWORD_BCRYPT ) ]);

        if ( $new_user ) {
            return $this->db->lastInsertId();
        }

        return false;
    }

    public function update($id, $data)
    {
        $statement = $this->db->prepare('UPDATE users SET name = :name, password = :password WHERE id = :id');

        $updated_user = $statement->execute(['name' => $data['name'], 'password' => $data['password'], 'id' => $id]);

        return $updated_user;
    }

    public function delete($id)
    {
        $statement = $this->db->prepare('DELETE FROM users WHERE id = :id');

        $deleted_user = $statement->execute(['id' => $id]);

        return $deleted_user;
    }
}