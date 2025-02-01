<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
      <button type="button" class="btn btn-outline-success">{{__('dashboard.edit')}} <li class="la la-edit" ></li></button>
      <button type="button"  class="btn btn-outline-danger">{{__('dashboard.status')}} <li class="la la-stop" ></li> </button>
      <div class="btn-group" role="group">
        <button id="btnGroupDrop2" type="button" class="btn btn-outline-info dropdown-toggle"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('dashboard.delete')}} <li class="la la-trash" ></li>
        </button>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
            <form action="{{route('dashpoard.category.destroy',$category->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete_confirm  dropdown-item" href="#">Dropdown link</button>
          
        </form>
       
        </div>
      </div>
    </div>
  </div>