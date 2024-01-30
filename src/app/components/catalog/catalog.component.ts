
import { ChangeDetectorRef, Component } from '@angular/core';
import { FlowerService } from '../../services/flower.service';
import { AuthService } from '../../services/auth.service';
import { NavigationEnd, Route, Router } from '@angular/router';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { filter } from 'rxjs';
import { Listing } from '../../interfaces/listing';
import { Flower } from '../../interfaces/flower';
import { Order } from '../../interfaces/order';

@Component({
  selector: 'app-catalog',
  templateUrl: './catalog.component.html',
  styleUrl: './catalog.component.scss'
})
export class CatalogComponent {
  constructor(
    private flowerService : FlowerService,
    private authService: AuthService,
    private router: Router,
    private fb: FormBuilder) { 
    }

  displayedAdminCatalog: string[] = ['delete', 'flowerName', 'price', 'description'];
  displayedUserCatalog: string[] = ['flowerName', 'price', 'description', 'order'];
  displayedGuestCatalog: string[] = ['flowerName', 'price', 'description'];
  
  productData!: Listing[];
  isProductSelected: boolean = false;
  isLoading: boolean = true;
  userId: number = 0;
  isAdmin: boolean = false;
  isUser: boolean = false;
  showPlacehoder: boolean = false;

  filterForm?: any;
  flowers!: Flower[];



  ngOnInit(): void {

    this.getAllFlowers();

    this.filterForm = this.fb.group({
      flowerName: ['']
    });

    this.authService.userType$.subscribe((val: string) => {
      if(val != "guest"){
        val == "admin" ? this.isAdmin = true : this.isUser = true;
      }
    });

    this.flowerService.getAllListings().subscribe((data: any[]) =>{
      this.productData = data[0];
    });
    
    
  }

  onSubmit(): void {
    this.flowerService.getListingsByFlower(this.filterForm.get("flowerName").value).subscribe((data: any[]) => {

      this.productData = data[0];
    })
  }

  getAllFlowers(): void {
    this.flowerService.getFlowers("").subscribe((data: any[]) => {
      this.flowers = data[0]; 
    })
  }


  onOrder(listing: Listing): void {
    this.flowerService.setOrder(listing.ID, Number(localStorage.getItem("currentUserID")))
  }

  onDelete(order: Listing): void {
    // this.productService.deleteOrder(order.id);
    // this.productData.map(item => {
    //     this.productData = this.productData.filter(item => item.id != order.id);
    // });
  }

}
