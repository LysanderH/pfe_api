# Auth endpoints


## Logout a user

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "https://api.loalhost/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer USER_TOKEN"
```

```javascript
const url = new URL(
    "https://api.loalhost/api/auth/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer USER_TOKEN",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTapi-auth-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-auth-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-logout"></code></pre>
</div>
<div id="execution-error-POSTapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-logout"></code></pre>
</div>
<form id="form-POSTapi-auth-logout" data-method="POST" data-path="api/auth/logout" data-authed="1" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json","Authorization":"Bearer USER_TOKEN"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-auth-logout" onclick="tryItOut('POSTapi-auth-logout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-auth-logout" onclick="cancelTryOut('POSTapi-auth-logout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-auth-logout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/auth/logout</code></b>
</p>
<p>
<label id="auth-POSTapi-auth-logout" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-auth-logout" data-component="header"></label>
</p>
</form>


## Register a user




> Example request:

```bash
curl -X POST \
    "https://api.loalhost/api/sanctum/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"enim","email":"qui","password":"et","password_confirmation":"beatae","device_name":"nisi"}'

```

```javascript
const url = new URL(
    "https://api.loalhost/api/sanctum/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "enim",
    "email": "qui",
    "password": "et",
    "password_confirmation": "beatae",
    "device_name": "nisi"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{}
```
<div id="execution-results-POSTapi-sanctum-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-sanctum-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-sanctum-register"></code></pre>
</div>
<div id="execution-error-POSTapi-sanctum-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-sanctum-register"></code></pre>
</div>
<form id="form-POSTapi-sanctum-register" data-method="POST" data-path="api/sanctum/register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-sanctum-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-sanctum-register" onclick="tryItOut('POSTapi-sanctum-register');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-sanctum-register" onclick="cancelTryOut('POSTapi-sanctum-register');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-sanctum-register" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/sanctum/register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-sanctum-register" data-component="body"  hidden>
<br>
The name of the user.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-sanctum-register" data-component="body"  hidden>
<br>
The email of the user.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-sanctum-register" data-component="body"  hidden>
<br>
The password of the user.
</p>
<p>
<b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="password" name="password_confirmation" data-endpoint="POSTapi-sanctum-register" data-component="body"  hidden>
<br>
The confirmation password of the user.
</p>
<p>
<b><code>device_name</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="device_name" data-endpoint="POSTapi-sanctum-register" data-component="body"  hidden>
<br>
The device name.
</p>

</form>


## Authenticate a user




> Example request:

```bash
curl -X POST \
    "https://api.loalhost/api/sanctum/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"fugiat","password":"qui","device_name":"quos"}'

```

```javascript
const url = new URL(
    "https://api.loalhost/api/sanctum/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "fugiat",
    "password": "qui",
    "device_name": "quos"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json

{
     data: "2|qQpZb2sWHmBtvCflqx4sKBugfbW8zKrYMcAOCpAL",
     status: 200,
     statusText: "OK",
     headers: {…},
     config: {…},
}
```
<div id="execution-results-POSTapi-sanctum-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-sanctum-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-sanctum-login"></code></pre>
</div>
<div id="execution-error-POSTapi-sanctum-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-sanctum-login"></code></pre>
</div>
<form id="form-POSTapi-sanctum-login" data-method="POST" data-path="api/sanctum/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-sanctum-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-sanctum-login" onclick="tryItOut('POSTapi-sanctum-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-sanctum-login" onclick="cancelTryOut('POSTapi-sanctum-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-sanctum-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/sanctum/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-sanctum-login" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-sanctum-login" data-component="body"  hidden>
<br>

</p>
<p>
<b><code>device_name</code></b>&nbsp;&nbsp;<small>required</small>     <i>optional</i> &nbsp;
<input type="text" name="device_name" data-endpoint="POSTapi-sanctum-login" data-component="body"  hidden>
<br>

</p>

</form>



