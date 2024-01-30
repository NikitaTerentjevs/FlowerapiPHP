import { Component } from '@angular/core';
import { FlowersComponent } from './components/flowers/flowers.component';
import { AuthService } from './services/auth.service';

import { ActivatedRoute, Router, UrlSegment } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrl: './app.component.scss'
})
export class AppComponent {
  isLoggedIn: boolean = false;
  isAdmin: boolean = false;
  
  constructor(
    private authService: AuthService, 
    private router : Router) {
    localStorage.clear()
  }

  ngOnInit(): void {
    this.authService.logInState$.subscribe((val: boolean) => {
      this.isLoggedIn = val;
    })
    this.authService.userType$.subscribe((val: string) => {
      val == "admin" ? this.isAdmin = true : this.isAdmin = false;
    });
  }

  logout(): void {
    this.authService.logout();
    this.router.navigate(['/']);
  }
}
