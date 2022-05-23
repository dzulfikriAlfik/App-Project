class CommonAPI {
   getLogoutAPI(url, body, success, error) {
      $.ajax({
         url: url,
         method: "get",
         dataType: "json",
         data: body,
         headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            "Content-Type": "application/json",
         },
         success: function (response) {
            if (success) success(response);
         },
         error: function (response) {
            if (error) error(response);
         },
      });
   }

   getAPI(url, success, error) {
      $.ajax({
         url: url,
         method: "get",
         dataType: "json",
         headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            "Content-Type": "application/json",
         },
         success: function (response) {
            commonJS.handleResponse(response, success);
         },
         error: function (response) {
            commonJS.handleResponse(response, error);
         },
      });
   }

   getAPIBody(url, body, success, error) {
      $.ajax({
         url: url,
         method: "get",
         dataType: "json",
         data: body,
         headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            "Content-Type": "application/json",
         },
         success: function (response) {
            commonJS.handleResponse(response, success);
         },
         error: function (response) {
            commonJS.handleResponse(response, error);
         },
      });
   }

   postAPI(url, data, success, error) {
      $.ajax({
         url: url,
         type: "POST",
         dataType: "JSON",
         // processData: false,
         // contentType: false,
         data: data,
         headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            // 'Content-Type':'application/json'
         },
         success: function (response) {
            commonJS.handleResponse(response, success);
         },
         error: function (response) {
            commonJS.handleResponse(response, error);
         },
      });
   }

   postFormDataAPI(url, formData, success, error) {
      $.ajax({
         type: "POST",
         url: url,
         data: formData,
         // dataType: "JSON",
         contentType: false,
         processData: false,
         headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            // "Content-Type": "application/json",
         },
         success: function (response) {
            if (success) success(response);
         },
         error: function (response) {
            if (error) error(response);
         },
      });
   }

   postWithImageBase64API(url, formData, success, error) {
      $.ajax({
         type: "POST",
         url: url,
         data: formData,
         headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            // "Content-Type": "application/json",
         },
         success: function (response) {
            if (success) success(response);
         },
         error: function (response) {
            if (error) error(response);
         },
      });
   }

   putFormDataAPI(url, formData, success, error) {
      $.ajax({
         type: "PUT",
         url: url,
         data: formData,
         // dataType: "JSON",
         contentType: false,
         processData: false,
         headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            // "Content-Type": "application/json",
         },
         success: function (response) {
            if (success) success(response);
         },
         error: function (response) {
            if (error) error(response);
         },
      });
   }

   putAPI(url, body, success, error) {
      $.ajax({
         url: url,
         type: "PUT",
         dataType: "JSON",
         // processData: false,
         // contentType: false,
         data: body,
         headers: {
            Authorization: "Bearer " + localStorage.getItem("token"),
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            // 'Content-Type':'application/json'
         },
         success: function (response) {
            commonJS.handleResponse(response, success);
         },
         error: function (response) {
            commonJS.handleResponse(response, error);
         },
      });
   }

   async deleteAPI(url, success, error) {
      let resp;
      try {
         resp = await $.ajax({
            url: url,
            type: "DELETE",
            dataType: "JSON",
            processData: false,
            contentType: false,
            headers: {
               Authorization: "Bearer " + localStorage.getItem("token"),
               "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
               // 'Content-Type':'application/json'
            },
            // success: function(response){
            //     commonJS.handleResponse(response, success)
            // },
            // error:function(response){
            //     commonJS.handleResponse(response, error)
            // }
         });
         if (resp.status == 200) {
            commonJS.handleResponse(resp, success);
         } else if (resp.status == 400) {
            commonJS.handleResponse(resp, error);
         } else {
            commonJS.handleResponse(resp, error);
         }
      } catch (error) {
         commonJS.swalError(error.responseJSON.message || "Unexpected error");
      }
   }

   async postAPIAsync(url, success, error) {
      let resp;
      try {
         resp = await $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            processData: false,
            contentType: false,
            data: {},
            headers: {
               Authorization: "Bearer " + localStorage.getItem("token"),
               "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
               // 'Content-Type':'application/json'
            },
            // success: function(response){
            //     commonJS.handleResponse(response, success)
            // },
            // error:function(response){
            //     commonJS.handleResponse(response, error)
            // }
         });

         if (resp.status == 200) {
            commonJS.handleResponse(resp, success);
         } else if (resp.status == 400) {
            commonJS.handleResponse(resp, error);
         } else {
            commonJS.handleResponse(resp, error);
         }
      } catch (error) {
         commonJS.swalError(error.responseJSON.message || "Unexpected error");
      }
   }

   async hideShowAPI(url, success, error) {
      let resp;
      try {
         resp = await $.ajax({
            url: url,
            method: "get",
            dataType: "json",
            headers: {
               Authorization: "Bearer " + localStorage.getItem("token"),
               "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
               "Content-Type": "application/json",
            },
         });
         if (resp.status == 200) {
            commonJS.handleResponse(resp, success);
         } else if (resp.status == 400) {
            commonJS.handleResponse(resp, error);
         } else {
            commonJS.handleResponse(resp, error);
         }
      } catch (error) {
         commonJS.swalError(error.responseJSON.message || "Unexpected error");
      }
   }
}

const commonAPI = new CommonAPI();
