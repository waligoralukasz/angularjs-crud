var myApp = angular.module('myApp', ['ngRoute']);

myApp.config(['$routeProvider', function($routeProvider){
    $routeProvider
        .when('/posts', {
            templateUrl: 'views/posts.html',
            controller: 'MyPosts'
        })
        .when('/create',{
            templateUrl: 'views/create.html',
            controller: 'MyPosts'
        })        
        .when('/edit/:id',{
            templateUrl: 'views/edit.html',
            controller: 'MyPost'
        }).otherwise({
            redirectTo: '/posts'
        });
}]);

myApp.controller('MyPosts', ['$scope','$http','$routeParams', function($scope, $http, $routeParams){
    //usuwanie elementu
    // $scope.removeItem = function ($index){
    //     $scope.persons.splice($index,1);
    // };

    // //dodawanie elementu
    // $scope.addItem = function(){
    //     $scope.persons.push(
    //         {
    //             name: $scope.newperson.name,
    //             age: parseInt($scope.newperson.age)
    //         }
    //     );
    //     $scope.newperson.name = "";
    //     $scope.newperson.age = "";
    // };

//utworzenie posta
// $scope.addPost = function(post){
//     console.log(post.title_post);
//     $http.post('api/createPost.php',{
//         'title_post': post.title_post,
//         'desc_post': post.desc_post,
//         'date_post':  post.date_post,
//         'id_user': post.id_user,
//         'id_category': post.id_category
//     }).success(function(data) {
//             alert(data);
//         });
// }

$scope.addPost = function(post){
    $http.post('api/createPost.php',{
        'title_post': post.title_post,
        'desc_post': post.desc_post,
        'date_post':  post.date_post,
        'id_user': post.id_user,
        'id_category': post.id_category
    }).success(function(data) {
            alert(data);
        });
}
//edycja posta

//usunięcie posta
    $scope.removePost = function(post, id){
        if (confirm("Czy na pewno usunąć?")) {
            var id = id;
            var removeP = $scope.posts.indexOf(post);
            $scope.posts.splice(removeP, 1);

            $http.get('api/deletePost.php?id='+id)
                .success(function(data, status) {
                    alert(data, status);
                });
                
        } else {
            console.log("Błąd usuwania!");
            return false;
        }
    };

//Pobranie wszystkich postów
    $http.get('api/posts.php').success(function(data){
        console.log(data);
        $scope.posts = data;
        // console.log(data);
    }).error(function(data){
        console.log("Błąd pobierania danych!");
    });



}]);

myApp.controller('MyPost', ['$scope','$http','$routeParams', function($scope, $http, $routeParams){

    var id = $routeParams.id
    console.log(id);
    // $scope.post = posts[$routeParams.id];
    $http.get('api/post.php?id='+id).success(function(data){
        var post = data;
        $scope.post = post;
        console.log(post);
    }).error(function(data){
        console.log("Błąd pobierania danych!");
    });

    $scope.updatePost = function(post){
        $http.post('api/updatePost.php',{
            'id': post.id,
            'title_post': post.title_post,
            'desc_post': post.desc_post,
            'date_post': post.date_post,
            'id_user': post.id_user,
            'id_category': post.id_category
        }).success(function(data) {
                alert(data);
            });
    }
}])

