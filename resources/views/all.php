<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body ng-app="dentalApp" ng-controller="mainCtrl">

<p> {[{ name }]} </p>

<div ng-view></div>

<!--<div ng-include="'/resources/views/all.html'"> </div>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Angular libs -->
<script src="js/angular.min.js"></script>
<script src="js/angular-animate.min.js"></script>
<script src="js/angular-route.min.js"></script>

<!-- Angular files -->
<script src="angular/app.js"></script>
<script src="angular/controllers/mainCtrl.js"></script>

<!--<script type="text/javascript">-->
<!--    // to remove # from routing URLs-->
<!--    angular.element(document.getElementsByTagName('head')).append(angular.element('<base href="' + window.location.pathname + '" />'));-->
<!--</script>-->


</body>
</html>