<?php 
  /* Template Name: Signup Page */
?>

<?php get_header(); ?>
  <div class="container">
    <div class="row">
      <div class="col-1"></div>
      <div class="col-10">
        <h1 class="heading-one center">Signup to make subscribing easy as!</h1>
      </div>
      <div class="col-1"></div>
      <div class="col-2"></div>
      <div class="col-8">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate aliquam ducimus veritatis! Ex totam, error, minus et repellendus quisquam culpa inventore non nesciunt dolor maiores impedit asperiores consequatur, a commodi!</p>
      </div>
      <div class="col-2"></div>
      
      <div class="col-2"></div>
      <div class="col-8">

        <form class="my-form">
          <div class="form-group my-form__group">
            <label for="nameInput">Full Name</label>
            <input type="text" class="form-control my-form__control" id="nameInput" aria-describedby="emailHelp" placeholder="Enter full name">
          </div>
          <div class="form-group my-form__group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control my-form__control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group my-form__group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control my-form__control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group my-form__group">
            <label for="exampleInputAddress1">Address</label>
            <input type="text" class="form-control my-form__control" id="exampleInputAddress1" placeholder="Address">
          </div>
          <button type="submit" class="btn btn-primary center">Submit</button>
        </form>

      </div>
      <div class="col-2"></div>
    </div>


  </div>
<?php get_footer(); ?>