<a href="{{ route('categories.create') }}" style="display: inline-block; background-color: #4CAF50; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; margin-bottom: 20px;">
  Create Category
</a>
<table>
  
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Action</th>
  </tr>
  @foreach ($items as $category)
  <tr>
    <td>
      <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
    </td>
    <td>{{ $category->description }}</td>
    <td>
      <a href="{{ route('categories.edit', $category->id) }}">
        Edit
      </a>
      |
      <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" style="background-color: #f44336; color: white; padding: 5px 10px; border: none; cursor: pointer;">Delete</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>
