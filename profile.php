<?php 
include 'inc/header.php';
include 'inc/profile-carousel.php';
?>

<!-- LOGIN FORM FOR LOGGED OUT USERS -->
<!-- <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-3">    
      <div class="user-login" *ngIf="!(authService.user | async)">
          <label for="e-mail">E-Mail</label><br>
          <input class="form-control" type="text" [(ngModel)]="email"><br><br>
  
          <label for="e-mail">Password</label>
          <input class="form-control" type="password" [(ngModel)]="password">
          <button class="btn" (click)="login()" [disabled]="!email || !password">
            Login
          </button>
        </div>
      </div>
  </div>
  <div class="d-flex justify-content-md-end justify-content-sm-center">
    <button class="btn btn-outline-secondary" (click)="logout()" *ngIf="authService.user | async">
    Logout
    </button>
  </div> -->





<!-- CONTENT EXCLUSIVE FOR LOGGED IN USERS -->
<div class="container">
  <div class="row">
    <!-- Content area -->
    <div class="col-md-7">
      <h3>Information</h3>
      <table class="table table-sm table-profile">
        <tbody>
          <tr>
            <th>Course:</th>
            <td>FSWD 10</td>
          </tr>
          <tr>
            <th>Skills:</td>
            <td>Baking, Eating, Gardening</td>
          </tr>
          <tr>
            <th>Job Status:</th>
            <td>Green/Red</td>
          </tr>
          <tr>
            <th>Portoflio:</th>
            <td>SomeKindaUrl</td>
          </tr>
          <tr>
            <th>Github Profile:</th>
            <td>Green/Red</td>
          </tr>   
          <tr>
            <th>eMail:</th>
            <td>lala@lulu.com</td>
          </tr> 
          <tr>
            <th>Phone:</th>
            <td>+43 699 13532132</td>
          </tr>                                      
        </tbody>
      </table>     
    </div>

    <!-- Sidebar -->
    <div class="col-md-5 sidebar">
       <h3>{Firstname}s Badges</h3>

      
    </div>    
  </div>
</div>

<?php 
include 'inc/footer.php';
?>