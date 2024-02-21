<script>
import axios from "redaxios"; // Using regular Axios

let token = localStorage.getItem("token");

const login = (credentials) => {
  return axios
    .post("http://localhost/api/login", credentials)
    .then((response) => {
      if (response.data && response.data.token) {
        token = response.data.token; // Save token to local storage
        localStorage.setItem("token", token);
      }
      return response;
    });
};

const logout = () => {
  token = null; // Clear token
  localStorage.removeItem("token"); // Remove token from local storage
};

const isAuthenticated = () => {
  return !!token; // Check if token exists
};

const getToken = () => {
  return token;
};

export { login, logout, isAuthenticated, getToken };
</script>
