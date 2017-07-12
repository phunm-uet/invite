<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Tool AutoLike</title>
</head>
<body>

<div class="container" style="margin-top : 20px" id="app">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#posts">Quản lý posts</a></li>
    <li><a data-toggle="tab" href="#accounts">Quản lý tài khoản</a></li>
  </ul>

  <div class="tab-content" >
    <div id="posts" class="tab-pane fade in active">
        <h4>Danh sách bài posts</h4>
        
        <button type="button" class="btn btn-primary pull-right" @click="openModal">Thêm bài đăng</button>
        <br><br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Post_ID</th>
                        <th>Trạng thái</th>
                        <th>Tổng số Like</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(post,index) in posts">
                       <td>{{index + 1}}</td>
                       <td>{{post.postid}}</td>
                       <td>{{post.invite_status}}</td>
                       <td>{{post.total_invite}}</td>
                       <td>{{post.update_time}}</td>
                       <td>
                            <a class="btn btn-danger btn-xs" href="javascript:void(0)" role="button" @click="delPost(post.postid,index)">Xóa</a>
                       </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
    <div id="accounts" class="tab-pane fade">
        <h4>Danh sách Account</h4>

        <button type="button" class="btn btn-primary pull-right" @click="openModalAcc">Thêm người dùng</button>
        <br><br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Account ID</th>
                        <th>Cookie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(account,index) in accounts">
                       <td>{{index + 1}}</td>
                       <td>{{account.acc_id}}</td>
                       <td>{{account.cookie}}</td>
                       <td>
                            <a class="btn btn-danger btn-xs" href="javascript:void(0)" @click="delAcc(account.acc_id,index)">Xóa</a>
                       </td>
                    </tr>
                </tbody>
            </table>
        </div>        
    </div>
  </div>

<!--Modal them bai dang-->
  <div class="modal fade" id="modal-post">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Thêm mới bài đăng</h4>
              </div>
              <div class="modal-body">
                  
                  <form action="" method="POST" role="form">  
                      <div class="form-group">
                          <label for="">Post ID</label>
                          <input type="text" class="form-control" id="" placeholder="12345_6789" v-model="post">
                      </div>                      
                      <button type="button" class="btn btn-primary btn-block" @click="addPost">Thêm Post</button>
                  </form>
                  
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>

<!-- Modal them cookie nguoi dung-->

<div class="modal fade" id="modal-acc">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Thêm người dùng mới</h4>
            </div>
            <div class="modal-body">
                
                <form action="" method="POST" role="form">
                    <div class="form-group">
                        <label for="">Cookie</label>
                        <textarea type="text" class="form-control" cols="15" placeholder="Cookie" v-model="cookie"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary btn-block" @click="addAcc">Thêm người dùng</button>
                </form>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

</div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/vue"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script>
<script>
    var app = new Vue({
    el: '#app',
    data: {
        posts : [],
        accounts : [],
        post : "",
        cookie : ""
    },
    created : function(){
        this.getPosts();
        this.getAccounts();
    },
    methods : {
        getPosts : function(){
            axios.get("api.php?action=get_posts")
            .then(res => {
                this.posts = res.data;
            })
        },
        getAccounts : function() {
            axios.get("api.php?action=get_accounts")
            .then(res => {
                this.accounts = res.data;
            })            
        },
        openModal : function(){
            $("#modal-post").modal();
        },
        openModalAcc : function(){
            $("#modal-acc").modal();
        },
        addPost : function() {
            axios.post("api.php", {
                action : "add_post",
                post_id : this.post
            })
            .then(res => {
                $("#modal-post").modal('hide');
                this.posts.push(res.data);
            })
        },
        addAcc : function() {
            axios.post("api.php", {
                action : "add_acc",
                cookie : this.cookie
            })
            .then(res => {
                $("#modal-acc").modal('hide');
            })
        },
        delPost : function(post_id,index) {
            if(confirm("Bạn có chắc muốn xóa post?")){
                axios.post("api.php", {
                    action : "del_post",
                    post_id : post_id
                })
                .then(res => {
                    this.posts.splice(index,1);
                })
            }
        },
        delAcc : function(acc_id,index){
            if(confirm("Bạn có chắc muốn xóa Acc?")){
                axios.post("api.php", {
                    action : "del_acc",
                    acc_id : acc_id
                })
                .then(res => {
                    this.accounts.splice(index,1);
                })                
            }
        }
    }
    })    
</script>
</html>