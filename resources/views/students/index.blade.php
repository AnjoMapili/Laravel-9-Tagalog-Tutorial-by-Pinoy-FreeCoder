
@include('partials.header',['Student' => 'Student System'])
  {{-- <x-nav/> --}}
 <?php $array = array('title' => 'Student System'); ?>
  <x-nav :data="$array"/>
  

  <header class="max-w-lg mx-auto mt-5">
    <a href="#">
      <h1 class="text-4xl font-bold text-white text-center">Student List</h1>
    </a>
  </header>
  <section class="mt-10">
    <div class="overflow-x-auto relatve">
      <table class="w-96 mx-auto text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
          <th scope="col" class="py-3 px-6">
              first name
          </th>
          <th scope="col" class="py-3 px-6">
              last name
          </th>
          <th scope="col" class="py-3 px-6">
              email
          </th>
          <th scope="col" class="py-3 px-6">
              age
          </th>
          <th scope="col">

          </th>
          <th scope="col">
      
          </th>
        </tr>
        </thead>
        <tbody>
                @foreach ($students as $student)
                <tr class="bg-gray-800 border-b text-white">
                  
                  <td class="py-4 px-6">{{ $student->first_name }}</td>
                  <td class="py-4 px-6">{{ $student->last_name }}</td>
                  <td class="py-4 px-6">{{ $student->email }}</td>
                  <td class="py-4 px-6">{{ $student->age }}</td>
                  <td>
                    <a href="/student/{{ $student->id }}" class="bg-sky-600 text-white px-4 py-2 mr-2 rounded">view</a>
                  </td>
                  <td>
                    <form action="/student/{{ $student->id }}" method="POST">
                        @method('delete')
                        @csrf
                     <button
                          type="submit" class="bg-red-600 text-white px-4 py-2 rounded" >delete
                     </button>
                  </form>
                  </td>
                  @endforeach
          </tr>
        </tbody>
      </table>
      <div class="mx-auto max-w-lg pt-6 p4">
        {{ $students->links() }}
      </div>
     
    </div>
  </section>

  @include('partials.footer')

  
    {{-- <ul>
      @foreach ($students as $student)
      <li>{{ $student->first_name }} {{ $student->last_name }}  </li>
      @endforeach
    
    </ul> --}}