import { Injectable } from '@angular/core';
import { BehaviorSubject, Observable } from 'rxjs';
import { HttpClient,HttpParams,HttpHeaders } from '@angular/common/http';
import { Flower } from '../interfaces/flower';
import { Order } from '../interfaces/order';
import { Listing } from '../interfaces/listing';

@Injectable({
  providedIn: 'root'
})
export class FlowerService {
  constructor(
    private http: HttpClient
  ) { }
  //Flowers

  setFlower(flower: Flower): any {
    const params = new HttpParams()
      .set('flowerName', flower.name.toString())
      .set('flowerSeason', flower.season.toString())
      .set('flowerCountry', flower.harvest_country.toString());

    return this.http.post<any>("http://localhost/flowerapi/products/setProduct.php", { params });
  }

  getFlowers(flowerName: string): Observable<Flower[]> {
    const params = new HttpParams()
      .set('flowerName', flowerName.toString());

    return this.http.post<Flower[]>("http://localhost/flowerapi/products/getFlowers.php", { params });
  }

  //Listings

  setListing(listing: Listing): void {
    const params = new HttpParams()
      .set('flowerName', listing.flower_name.toString())
      .set('listingPrice', listing.price.toString())
      .set('listingDescription', listing.description.toString());

    this.http.post<any[]>("http://localhost/flowerapi/products/setProduct.php", { params });
  }

  getAllListings(): Observable<Listing[]> {
    const params = new HttpParams()
    .set('listingID', "")
    .set('flowerName', "");

    return this.http.post<Listing[]>("http://localhost/flowerapi/products/getListings.php",{ params });
  }

  getListing(listingID: number): Observable<Listing[]> {
    const params = new HttpParams()
    .set('listingID', listingID.toString());

    return this.http.post<Listing[]>("http://localhost/flowerapi/products/getListings.php",{ params });
  }

  getListingsByFlower(flowerName: string): Observable<Listing[]> {
    const params = new HttpParams()
    .set('flowerName', flowerName.toString());

    return this.http.post<Listing[]>("http://localhost/flowerapi/products/getListings.php",{ params });
  }

  removeListing(listings: number[]): any{
    const params = new HttpParams()
    .set('listingsToDelete', listings.toString());

    return this.http.post<any>("http://localhost/flowerapi/products/getListings.php",{ params });
  }

  //Orders

  setOrder(listing: number, user: number): any {
    const params = new HttpParams()
      .set('listingID', listing.toString())
      .set('userID', user.toString());

    return this.http.post<Order[]>("http://localhost/flowerapi/products/setProduct.php", { params });
  }

  getAllOrders(): Observable<Order[]> {

    return this.http.post<Order[]>("http://localhost/flowerapi/products/getOrders.php","");
  }

  getOrder(orderID: number): Observable<Order[]> {
    const params = new HttpParams()
    .set('orderID', orderID.toString());

    return this.http.post<Order[]>("http://localhost/flowerapi/products/getOrders.php",{ params });
  }

  getOrderByUser(userID: number): Observable<Order[]> {
    const params = new HttpParams()
    .set('userID', userID.toString());

    return this.http.post<Order[]>("http://localhost/flowerapi/products/getOrders.php",{ params });
  }

  getOrderByListing(listingID: number): Observable<Order[]> {
    const params = new HttpParams()
    .set('listingID', listingID.toString());

    return this.http.post<Order[]>("http://localhost/flowerapi/products/getOrders.php",{ params });
  }

  removeOrder(orders: number[]): any{
    const params = new HttpParams()
    .set('ordersToDelete', orders.toString());

    return this.http.post<any>("http://localhost/flowerapi/products/getListings.php",{ params });
  }
}
