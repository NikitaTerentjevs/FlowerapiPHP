<?php
include_once 'Dbh.class.php';

class Model extends Dbh{
    //Flower shop functions

    //setters
    protected function setFlower($name, $season, $harvest_country) {
        $sql = "Insert Into flowers Values (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $season, $harvest_country]);
    }

    protected function setListing($flower_name, $price, $description) {
        $sql = "Insert Into listings (flower_name, price, description) Values (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$flower_name, $price, $description]);
    }

    protected function setOrder($listing, $user) {
        $sql = "Insert Into orders (listing, user) Values (?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$listing, $user]);
    }

    //deleters
    protected function removeListing($listing_id) {
        $sql = "Delete From orders Where listing  = ?";
        $stmt = $this->connect()->prepare($sql);
        if ($stmt->execute([$listing_id])) {
            $sql = "Delete From listings Where ID  = ?";
            $stmt = $this->connect()->prepare($sql);

            return $stmt->execute([$listing_id]);
        } else 
        return false;
    }

    protected function removeOrder($order_id) {
        $sql = "Delete From orders Where id  = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$order_id]);
    }

    //getters

    protected function getAllListings() {
        $sql = "Select * from listings";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results;
    }

    protected function getAllOrders() {
        $sql = "Select * from orders";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();

        return $results;
    }

    protected function getFlower($flower_name) {
        $sql = "Select * from flowers where name like ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["%". $flower_name ."%"]);
        $results = $stmt->fetchAll();

        return $results;
    }

    protected function getListing($listing_id) {
        $sql = "Select * from listings where ID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$listing_id]);
        $results = $stmt->fetchAll();

        return $results;
    }

    protected function getListingByFlower($flower_name) {
        $sql = "Select * from listings where flower_name like ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute(["%". $flower_name ."%"]);
        $results = $stmt->fetchAll();

        return $results;
    }

    protected function getOrder($order_id) {
        $sql = "Select * from orders where ID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$order_id]);
        $results = $stmt->fetchAll();

        return $results;
    }

    protected function getOrderByUser($user_id) {
        $sql = "Select ID from orders where user = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user_id]);
        $results = $stmt->fetchAll();

        return $results;
    }

    protected function getOrderByListing($listing_id) {
        $sql = "Select ID from orders where listing = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$listing_id]);
        $results = $stmt->fetchAll();

        return $results;
    }

    //Authentication functions

    protected function setUser($email, $pass, $username) {
        $userType = "user";
        $sql = "Insert into users (email, password, username, user_type) values (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email, $pass, $username, $userType]);
    }

    protected function isEmailRegistered($email) {
        $sql = "select email from users where email=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $results = $stmt->fetchAll();

        return $results;
    }

    protected function checkLoginInfo($email, $pass) {
        $sql = "select email from users where email=? and password=?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email, $pass]);
        $results = $stmt->fetchAll();

        return $results;
    }

    protected function getUser($email, $pass) {
        $sql = "select * from users where email=? and password=?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email, $pass]);
        $results = $stmt->fetchAll();

        return $results;
    }
}