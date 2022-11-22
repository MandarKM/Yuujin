<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="signupModalLabel">Sign up!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="partials\handlesignup.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Enter Email</label>
                        <input type="text" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We\'ll never share your email with anyone else.</div>

                        <label for="exampleInputEmail1" class="form-label">Enter a password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword" aria-describedby="emailHelp">

                        <label for="signupcpassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword" aria-describedby="emailHelp">

                    </div>
                    <button type="submit" class="btn btn-outline-info">Sign Up</button>
                </form>
            </div>

        </div>
    </div>
</div>