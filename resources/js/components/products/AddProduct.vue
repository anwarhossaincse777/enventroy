<template>
    <div class="card card-primary card-outline">
        <div class="card-body">
            <h5 class="card-title">Create product</h5>
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="card-body">
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text"  name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter products Name">

                        <span class="text-danger"></span>


                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-save"></i>Submit</button>
                </div>
            </form>
        </div>
    </div><!-- /.card -->
</template>

<script>
export default {
    name: "AddProduct"
}
</script>

<style scoped>

</style>
