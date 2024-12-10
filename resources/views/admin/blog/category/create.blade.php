<div class="modal fade" id="blog-category-modal" role="dialog" aria-labelledby="blog-category-modalLabel" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="blog-category-modalLabel">Add Blog Category</h5>
                <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
                <input class="form-control" id="blog_category_name" name="blog_category_name" type="text" placeholder="Category Name">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="addCategoryBtn" type="button">
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const data = {
            name: document.getElementById('blog_category_name').value,
            is_active: true,
        };

        document.getElementById('addCategoryBtn').addEventListener('click', function() {
            axios.post('/api/v1/admin/blog-category', data).then(function(response) {
                console.log(response.data);
                if (response.data && response.data.success == true) {
                    alert(response.data.message);
                    document.getElementById('blog_category_name').value = '';
                    document.querySelector('.btn-close').click();
                    getList();
                }
            }).catch(function(error) {
                console.log(error.response.data);
            });
        });
    });
</script>
