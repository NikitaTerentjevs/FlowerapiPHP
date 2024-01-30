import { HttpClient,HttpParams } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { ToastrService } from 'ngx-toastr';
import { BehaviorSubject } from 'rxjs';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private isAuthenticated = false;

  private logInState = new BehaviorSubject<any>(false);
  logInState$ = this.logInState.asObservable();

  private userType = new BehaviorSubject<string>("guest");
  userType$ = this.userType.asObservable();

  constructor(
    private http: HttpClient,
    private toastr: ToastrService,
    private router: Router
  ) { }

  logIn(email: string, password: string): any {
    const params = new HttpParams()
      .set('email', email.toString())
      .set('password', password.toString());

    this.http.post<any>("http://localhost/flowerapi/login/", { params }).subscribe((response: any) => {
      if(response['success']) {

        
        localStorage.setItem("currentUserID", response['userData']['ID']);
        localStorage.setItem("currentUserType", response['userData']['user_type']);
        localStorage.setItem("currentUserUsername", response['userData']['username']);

        this.userType.next(response['userData']['user_type']);
        this.logInState.next(true);
        this.isAuthenticated = true;

        this.toastr.success("Welcome, " + response['userData']['username'] + "!");
        this.router.navigate(['/catalog']);
      } else {
        this.toastr.error("Wrong username or password!");
      }
    });
  }

  addUser(email: string, username: string, password: string): void {
    const params = new HttpParams()
      .set('email', email.toString())
      .set('username', username.toString())
      .set('password', password.toString());
    this.http.post<any>("http://localhost/flowerapi/register/", { params }).subscribe((response: any) => {
      console.log(response);
      if(!response['success']) {
        this.toastr.error("This email is already registered");
        return;
      }
      this.toastr.success("User, " + response['userData']['username'] + " is registered!");
      this.router.navigate(['/catalog']);
    });
  }
  
  isAuthenticatedUser(): boolean {
    return this.isAuthenticated;
  }

  logout(): void {
    localStorage.removeItem("currentUserID");
    localStorage.removeItem("currentUserType");
    localStorage.removeItem("currentUserUsername");
    this.isAuthenticated = false;
    this.logInState.next(false);
    this.userType.next("guest");
  }
}
