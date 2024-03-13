<section class="form-section">
    <iframe class="form-section__map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.4625306992025!2d23.828172970410048!3d53.67853919301063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dfd62f1aae4493%3A0x67ef838fce252f24!2z0J_Qu9C-0YjRh9CwINCh0LDQstC10YbQutCw0Y8!5e0!3m2!1sru!2sby!4v1705934120557!5m2!1sru!2sby"
            style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    <form action="javascript:void(0)" id="leadsForm" class="form-section__form" method="POST"
          enctype="multipart/form-data">
        @csrf
        <h4>@lang('main.form.title')</h4>
        <p>@lang('main.form.subTitle')</p>
        @csrf
        <label for="name">@lang('main.form.name')</label>
        <input type="text" name="name" id="name" placeholder="@lang('main.form.name')">
        <label for="contact_info">@lang('main.form.email')</label>
        <input type="text" name="contact_info" id="contact_info" placeholder="Contact information" required>
        <label for="message">@lang('main.form.message')</label>
        <textarea name="message" id="message" placeholder="@lang('main.form.message')"></textarea>
        <button class="button-filled" type="submit">@lang('main.form.send')</button>
    </form>
</section>
<script>
    const form = document.getElementById("leadsForm");
    console.log(form);

    // TODO FRONT: Display messages via user input
    
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        var csrf = document.getElementsByName("csrf-token")[0].content;

        var data = new FormData(e.target);

        let response = await fetch("", {
            method: "POST",
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": csrf
            },
            body: data,
        });
        var result = await response.json()

        if (response.ok) {
            console.log("ACCESS:", result)
        } else {
            console.log("ERROR:", result.message);
        }

    });
</script>

