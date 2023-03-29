<x-app-layout>
  <div class="min-h-screen mx-auto px-4 sm:px-6 lg:px-8">
    <header class="my-16">
      <h1 class="text-5xl text-center text-gray-800 font-bold">My Tasks</h1>
      <p class="text-lg text-center text-gray-600 mt-4">What do you need to get done today?</p>
    </header>

    <div class="flex-auto text-center mb-2">
      <a href="/task" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <i class="bi bi-plus-square-fill"></i> Add new Task
      </a>
    </div>

    <table id="tasks-table" class="table-auto w-full mt-10">
      <thead>
        <tr>
          <th class="px-4 py-2">Description</th>
          <th class="px-4 py-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach(auth()->user()->tasks as $task)
        <tr>
  <td class="border px-4 py-2">{{ $task->description }}</td>
  <td class="border px-4 py-2 text-center">
    <a href="/task/{{$task->id}}" name="edit" class="text-indigo-600 hover:text-indigo-900 font-bold mr-4">Edit</a>
    <form action="/task/{{$task->id}}" class="inline-block">
      <button type="submit" name="delete" formmethod="POST" style="display: inline-block;" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
        Delete
      </button>
      {{ csrf_field() }}
    </form>
  </td>
</tr>

        @endforeach
      </tbody>
    </table>
  </div>
</x-app-layout>