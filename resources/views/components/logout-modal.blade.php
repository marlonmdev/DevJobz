    <!-- Modal -->
    <div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">LOGOUT CONFIRMATION</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    Are you sure to Logout?
                </div>
                <div class="modal-footer">
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="btn btn-danger">Yes</button>  
                    </form>
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>