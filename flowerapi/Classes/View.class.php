<?php
include_once 'Model.class.php';

class View extends Model {
    public function showFlowers($flower_name = "") {
        $results = $this->getFlower($flower_name);

        return $results;
    }

    public function showAllOrders() {
        $results = $this->getAllOrders();

        return $results;
    }

    public function showAllListings() {
        $results = $this->getAllListings();

        return $results;
    }

    public function showListing($listing_id) {
        $results = $this->getListing($listing_id);

        return $results;
    }

    public function showListingByFlower($flower_name) {
        $results = $this->getListingByFlower($flower_name);

        return $results;
    }

    public function showOrder($order_id) {
        $results = $this->getOrder($order_id);

        return $results;
    }

    public function showOrderByUser($user_id) {
        $results = $this->getOrderByUser($user_id);

        return $results;
    }

    public function showOrderByListing($listing_id) {
        $results = $this->getOrderByUser($listing_id);

        return $results;
    }

    //Authentication

    public function isUserRegistered($email) {
        return $this->isEmailRegistered($email)[0]['email'];
    }

    public function loginUser($username, $pass) {
        $result = $this->checkLoginInfo($username, $pass);

        return $result[0]['email'];
    }

    public function getUserInfo($username, $pass) {
        $result = $this->getUser($username, $pass);

        return $result[0];
    }
}