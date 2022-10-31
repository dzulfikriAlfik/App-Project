function logout() {
  commonJS.swalConfirm(
    "Apakah anda yakin ingin logout?",
    "Ya",
    "Tidak",
    function () {
      let token = localStorage.getItem("token");
      let data = {
        token: token,
      };
      commonAPI.getLogoutAPI(`${baseUrl}/api/logout`, data, (response) => {
        if (response.status == 200) {
          window.location.href = `${baseUrl}/logout`;
        }
      });
    }
  );
}
