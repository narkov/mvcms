<h3>Adminlist</h3>

<table>
{section name=i loop=$users}
<tr>
  <td><b>Username:</b> {$users[i].username}</td>
  <td><b>Password:</b> {$users[i].password}</td>
  <td>
    <form action='adminhandle.php'>
    <input type='hidden' name='action' value='remove'>
    <input type='hidden' name='username' value='{$users[i].username}'>
    <input type='hidden' name='password' value='{$users[i].password}'>
    <input type='submit' value='Delete'>
    </form>
  </td>
</tr>
{/section}
</table>

<form action='adminhandle.php'>
  <input type='hidden' name='action' value='store'>
  <input type='text' name='username'>
  <input type='password' name='password'>
  <input type='submit' value='add member'>
</form>

<a href='adminpages.php?page=admin_start'><< Main page</a>
<a href='adminpages.php?page=admin_logout'>Logout</a>
