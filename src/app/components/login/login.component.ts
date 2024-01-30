import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../../services/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent {
  loginForm?: any;
  registerForm?: any;
  registerPasswordMismatch: boolean = false;
  showRegistrationWindow: boolean = false;

  constructor(
    private fb: FormBuilder,
    private authService: AuthService,
    private router: Router) { }

  ngOnInit(): void {
    this.loginForm = this.fb.group({
      email: ['', Validators.required],
      password: ['', Validators.required]
    });

    this.registerForm = this.fb.group({
      email: ['', Validators.required],
      username: ['', Validators.required],
      password: ['', Validators.required],
      });

  }

  onSubmit(): void {
    if (this.registerForm.valid) {
      
      this.authService.addUser(this.registerForm.get('email').value, this.registerForm.get('username').value, this.registerForm.get('password').value);
    } else
    if (this.loginForm.valid) {

     this.authService.logIn(this.loginForm.get('email').value, this.loginForm.get('password').value);
    }
    
  }
}
