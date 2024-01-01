{{-- <x-app-layout>

    <x-slot name="header">
        Lists of Posts
    </x-slot> --}}

     <table border="10">

         <tr>

            <th>S.NO</th>
            <th>Title</th>
            <th>Category</th>
            <th>Description</th>
            <th>Tags</th>

         </tr>

          @foreach($posts as $post)
         
<tr> {{dd($post)}}</tr>


     </table>

{{-- </x-app-layout> --}}