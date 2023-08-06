<form>
    <label for="title">Title</label>
    <select id="title" name="title" aria-required="true">
        <option value="mr">Mr</option>
        <option value="mrs">Mrs</option>
        <option value="miss">Miss</option>
        <option value="doctor">Doctor</option>
    </select>
    <label for="name">Full name</label>
    <input type="text" id="name" name="name"  aria-required="true">
    <div class="error none">
        <p>Please enter a valid name</p>
    </div>
    <label for="email">Email</label>
    <input type="text" id="email" name="email" aria-required="true">
    <div class="error none">
        <p>Please enter a valid email</p>
    </div>
    <label for="telephone">Telephone</label>
    <input type="text" id="telephone" name="telephone" aria-required="false">
    <div class="error none">
        <p>Please enter a valid telephone number</p>
    </div>
    <label for="dob">Date of birth</label>
    <input type="date" id="dob" name="dob" aria-required="true">
    <div class="error none">
        <p>Please enter a valid DOB</p>
    </div>
    <div class="form__interests">
        <input type="checkbox" id="walking" name="walking" value="true">
        <label for="walking">Walking</label>
        <input type="checkbox" id="cycling" name="cycling" value="true">
        <label for="cycling">Cycling</label>
        <input type="checkbox" id="reading" name="reading" value="true">
        <label for="reading">Reading</label>
        <input type="checkbox" id="films" name="films" value="true">
        <label for="films">Films</label>
    </div>
    <div class="error none">
        <p>Please enter a choice</p>
    </div>
    <input type="submit" value="Submit">
    <input type="hidden" id="token" name="token" value="<?php echo $_SESSION['crsf_token']; ?>">
</form>