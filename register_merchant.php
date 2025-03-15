<!DOCTYPE html>
  <html>
  <head>
    <title>Merchant Registration</title>
  </head>
  <body>
    <h1>Merchant Registration</h1>
    <form action="action.php" method="POST">
      <table>
        <tbody>
          <tr>
            <td>First Name</td>
            <td>
              <input type="text" name="first_name" />
            </td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td>
              <input type="text" name="last_name" />
            </td>
          </tr>
          <tr>
            <td>Email Adress</td>
            <td>
              <input type="email" name="email" />
            </td>
          </tr>
          <tr>
            <td>Password</td>
            <td>
              <input type="password" name="password" />
            </td>
          </tr>
          <tr>
            <td>Phone Number</td>
            <td>
              <input type="text" name="phone" />
            </td>
          </tr>
          <tr>
            <td>Date of Birth</td>
            <td>
              <input type="date" name="date_of_birth" />
            </td>
          </tr>
          <tr>
            <td>Gender</td>
            <td>
              <input type="radio" id="gender-male" name="gender" value="Male" />
              <label for="gender-male">Male</label>
              <input type="radio" id="gender-female" name="gender" value="Female" />
              <label for="gender-female">Female</label>
            </td>
          </tr>
          <tr>
            <td>Business Name</td>
            <td>
              <input type="text" name="business_name" />
            </td>
          </tr>
          <tr>
            <td>Business Type</td>
            <td>
              <select name="business_type">
                <option value="food">Food</option>
                <option value="clothing">Clothing</option>
                <option value="electronics">Electronics</option>
                <option value="furniture">Furniture</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>
            <input type="checkbox" id="agree-terms" name="agree_terms" value="agree" />
            <label for="agree-terms">I agree to all terms and conditions</label><br>
            </td>
          </tr>
          <tr>
            <td>
              <button type="submit">Register</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </body>
</html>