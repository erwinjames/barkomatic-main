<div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-lock"></i></span> Change Password
            </p>
        </header>
        <div class="card-content">
            <form id="ship_change_pswd_form">
                <div class="field">
                    <label class="label">New password</label>
                    <div class="control">
                        <input type="hidden" name="action" id="action" value="ship_chgn_psswd_btn" />
                        <input type="password" name="ship_nw_psswd" id="ship_nw_psswd" class="input" required>
                    </div>
                    <p class="help">Required. New password</p>
                </div>
                <div class="field">
                    <label class="label">Confirm password</label>
                    <div class="control">
                        <input type="password" name="ship_c_nw_psswd" id="ship_c_nw_psswd" class="input" required>
                    </div>
                    <p class="help">Required. New password one more time</p>
                </div>
                <hr>
                <div class="field">
                    <div class="control">
                        <input type="submit" name="ship_chgn_psswd_btn" id="ship_chgn_psswd_btn" value="Submit" class="button green">
                    </div>
                </div>
            </form>
        </div>
    </div>