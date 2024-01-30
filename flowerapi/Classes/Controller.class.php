<?php
include_once 'Model.class.php';

class Controller extends Model {

    public function saveFlower($name, $season, $harvest_country) {
        $this->setFlower($name, $season, $harvest_country);
    }

    public function saveListing($flower_name, $price, $description) {
        $this->setListing($flower_name, $price, $description);
    }

    public function saveOrder($listing, $user) {
        $this->setOrder($listing, $user);
    }

    /**
     * @param array $listings
     */
    public function deleteListings($listings) {
        $success = true;
        foreach($listings as $listing) {
            $action = $this->removeListing($listing);
            $success = $action ? true : false;
        }
        return $success;
    }

    /**
     * @param array $orders
     */
    public function deleteOrders($orders) {
        $success = true;
        foreach($orders as $order) {
            $action = $this->removeOrder($order);
            $success = $action ? true : false;
        }
        return $success;
    }

    public function addNewUser($email, $pass, $username) {
        $this->setUser($email, $pass, $username);
    }
}