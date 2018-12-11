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
<div class="container profile-page">
  <div class="row text-center">
    <!-- Content area -->
    <div class="col-md-12">
      <h3>Information</h3>
      <button class="btn btn-secondary">Edit my Data</button>
      <table class="table table-sm table-profile">
        <tbody>
          <tr>
            <th class="w-50">Course:</th>
            <td class="w-50">FSWD 10</td>
          </tr>
          <tr>
            <th>Skills:</th>
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
  </div>

  <!-- badges -->
<h3 class="mt-5 mb-4">{Firstname}s Badges</h3>
  <div class="row justify-content-center badges">
    <div class="col-4 text-center">      
      <img src="http://www.codefactory.academy/img/week1-golden-badge.png" alt="{blabla}">
      <p>Week 1 <br>Golden Git, HTML5, CSS3</p>
    </div>      
    <div class="col-4 badges text-center">      
      <img src="http://www.codefactory.academy/img/week1-golden-badge.png" alt="{blabla}">
      <p>Week 1 <br>Golden Git, HTML5, CSS3</p>
    </div>      
    <div class="col-4 badges text-center">      
      <img src="http://www.codefactory.academy/img/week1-golden-badge.png" alt="{blabla}">
      <p>Week 1 <br>Golden Git, HTML5, CSS3</p>
    </div>      
    <div class="col-4 badges text-center">      
      <img src="http://www.codefactory.academy/img/week1-golden-badge.png" alt="{blabla}">
      <p>Week 1 <br>Golden Git, HTML5, CSS3</p>
    </div>      
    <div class="col-4 badges text-center">      
      <img src="http://www.codefactory.academy/img/week1-golden-badge.png" alt="{blabla}">
      <p>Week 1 <br>Golden Git, HTML5, CSS3</p>
    </div>      
    <div class="col-4 badges text-center">      
      <img src="http://www.codefactory.academy/img/week1-golden-badge.png" alt="{blabla}">
      <p>Week 1 <br>Golden Git, HTML5, CSS3</p>  
    </div>    
</div>

<?php 
include 'inc/footer.php';
?>