<div id="alert" class="alert alert-success lead ml-5 p-2" role="alert">
    <span id="res-icon"></span>
    <span id="res-message"></span>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title mb-0">
                    <span class="icon"><i class="mdi mdi-account"></i></span> Shipping Active Accounts
                </p>
            </header>
            <div class="card-content p-0">
                <div class="card has-table border-0">
                    <div class="card-content" id="summ_reservation_data">
                        <img class="text-center" src="./resources/img/loading.gif" alt="Loading" style="text-align:center;width:48px;height:48px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-left modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="assign_role_edit_form">
                    <div class="form-group">
                        <label for="edit_role_name">Name</label>
                        <input type="text" name="edit_role_name" class="text-center form-control form-control-sm" id="edit_role_name" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_role_psswd">Email</label>
                        <input type="email" name="edit_role_email" class="text-center form-control form-control-sm" id="edit_role_email" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_role_uname">Username</label>
                        <input type="text" name="edit_role_uname" class="text-center form-control form-control-sm" id="edit_role_uname" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_role_psswd">Password</label>
                        <input type="password" name="edit_role_psswd" class="text-center form-control form-control-sm" id="edit_role_psswd" placeholder="" required>
                    </div>
                    <button type="submit" id="edit_role_submit" class="btn btn-primary btn-sm form-control">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>