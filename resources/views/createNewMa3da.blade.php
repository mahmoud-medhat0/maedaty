<form action="{{route('addNewMa3da.insert')}}" method="POST">
    @csrf
    <input name="title" placeholder="title" value="title">
    <input name="address" placeholder="address" value="title">
    <select name="for">
        <option value="male">رجال</option>
        <option value="female">نساء</option>
        <option value="all">الجميع</option>
    </select>
    <select name="maedaType">
        <option value="meals">وجبات</option>
        <option value="maieda">مائدة</option>
    </select>
    <input name="lat" placeholder="lat" value="30">
    <input name="lng" placeholder="lng" value="32">
    <input type="submit" placeholder="submit">
</form>