<html lang="en">
   <link type="text/css" rel="stylesheet" id="dark-mode-custom-link">
   <link type="text/css" rel="stylesheet" id="dark-mode-general-link">
   <style type="text/css" id="dark-mode-custom-style" lang="en"></style>
   <style type="text/css" id="dark-mode-native-style" lang="en"></style>
   <style type="text/css" id="dark-mode-native-sheet" lang="en"></style>
   <head>
      <meta charset="UTF-8">
     

      <link rel="apple-touch-icon" type="image/png" href="{{url('/')}}/{{setting()->logo}}">

 
      <link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/{{setting()->logo}}">
      <link rel="mask-icon" type="image/x-icon" href="{{url('/')}}/{{setting()->logo}}" color="#111">


      <title>{{setting()->name}}</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
      <style>
         * {
         box-sizing: border-box;
         }
         :root {
         --background: white;
         --primary: #ff1ead;
         --secondary: #1effc3;
         --card-size: 300px;
         }
         body {
         height: 100vh;
         margin: 0;
         display: grid;
         place-items: center;
         padding: 1rem;
         background: var(--background);
         font-family: "Source Code Pro", monospace;
         text-rendering: optimizelegibility;
         -webkit-font-smoothing: antialiased;
         -moz-osx-font-smoothing: grayscale;
         }
         .card {
         width: calc(var(--card-size) * 1.586);
         height: var(--card-size);
         border-radius: 0.75rem;
         box-shadow: 0 22px 70px 4px rgba(0, 0, 0, 0.56), 0 0 0 1px rgba(0, 0, 0, 0.3);
         background: black;
         display: grid;
         grid-template-columns: 40% auto;
         color: white;
         align-items: center;
         will-change: transform;
         transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.25s cubic-bezier(0.4, 0, 0.2, 1);
         text-align: right;
         }
         .card:hover {
         transform: scale(1.1);
         box-shadow: 0 32px 80px 14px rgba(0, 0, 0, 0.36), 0 0 0 1px rgba(0, 0, 0, 0.3);
         }
         .card-details {
         padding: 1rem;
         }
         .name {
         font-size: 1.25rem;
         }
         .occupation {
         font-weight: 600;
         color: var(--primary);
         }
         .card-avatar {
         display: grid;
         place-items: center;
         }
         svg {
         fill: white;
         width: 65%;
         }
         .card-about {
         margin-top: 1rem;
         display: grid;
         grid-auto-flow: column;
         }
         .item {
         display: flex;
         flex-direction: column;
         margin-bottom: 0.5rem;
         }
         .item .value {
         font-size: 1rem;
         }
         .item .label {
         margin-top: 0.15rem;
         font-size: 0.75rem;
         font-weight: 600;
         color: var(--primary);
         }
         .skills {
         display: flex;
         flex-direction: column;
         margin-top: 0.75rem;
         }
         .skills .label {
         font-size: 1rem;
         font-weight: 600;
         color: var(--primary);
         }
         .skills .value {
         margin-top: 0.15rem;
         font-size: 0.75rem;
         line-height: 1.25rem;
         }
      </style>
      <script>
         window.console = window.console || function(t) {};
      </script>
      <script>
         if (document.location.search.match(/type=embed/gi)) {
           window.parent.postMessage("resize", "*");
         }
      </script>

      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
   </head>
   <body  style="font-family: 'Cairo', sans-serif;" translate="no">
      <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:400,500" rel="stylesheet">


      <div class="card">

         <div class="card-avatar">
           <img  src="{{url('/')}}/{{$Member->photo}}" class="img-responsive" style="width: 123px; height: 165px;" alt="">
         </div>
         <div class="card-details">
 <img src="{{url('/')}}/{{setting()->logo}}" alt=""  style="height: 50px;width: 50px;" />
            <div class="occupation">  {{setting()->name}}</div>
            <div class="name">{{$Member->Quadruple_name}}</div>
            <div class="occupation">{{trans('trans.Membership_No')}} :{{$Member->Membership_No}}</div>
            <div class="card-about">
               <div class="item">
                  <span class="value"> @if ($Member->genderType == "male")
                     {{trans('trans.male')}} 
              @endif

               @if ($Member->genderType == "female")
                     {{trans('trans.female')}} 
              @endif

               @if ($Member->genderType == "other")
                     {{trans('trans.other')}} 
              @endif</span>
                  <span class="label"> {{trans('trans.genderType')}}</span>
               </div>
               <div class="item">
                  <span class="value">{{trans('trans.phone')}} </span>
                  <span class="label">  {{$Member->phone}}</span>
               </div>
               <div class="item">
                  <span class="value"> {{$Member->director}}</span>
                  <span class="label">{{trans('trans.director')}}</span>
               </div>
            </div>
            <div class="skills">
               <span class="value">
               توقيع  رئيس الحزب للتنظيم والعضوية   
            </span>
            </div>
         </div>


      </div>

       <a  style="  color: #FFF;
  background-color: #3598dc;
  border-color: #3598dc;
  cursor:pointer;
  padding: 5px;
" class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();"> {{trans('trans.print')}}
                                        <i class="fa fa-print"></i>
                                    </a>
   </body>
</html>
