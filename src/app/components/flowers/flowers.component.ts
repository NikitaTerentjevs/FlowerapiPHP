import { Component } from '@angular/core';
import { Flower } from '../../interfaces/flower';
import { FlowerService } from '../../services/flower.service';
import { NgFor } from '@angular/common';

@Component({
  selector: 'app-flowers',
  templateUrl: './flowers.component.html',
  styleUrl: './flowers.component.scss'
})
export class FlowersComponent {
    constructor(
    private flowerService: FlowerService
    ) {}

    flowers!: Flower[]; 

    ngOnInit(): void {
      
      this.getAllFlowers();
      console.log(this.flowers);
    }

    getAllFlowers(): void {
      this.flowerService.getFlowers("").subscribe((data: any[]) => {
        this.flowers = data[0];     
        console.log(data[0]);   
      })
    }
}
