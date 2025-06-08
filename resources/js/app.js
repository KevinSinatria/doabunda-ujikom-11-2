import "./bootstrap";
import Alpine from "alpinejs";
import "@phosphor-icons/web/light";
import "@phosphor-icons/web/bold";
import "@phosphor-icons/web/fill";
import "@phosphor-icons/web/duotone";
import "@phosphor-icons/web/regular";
import AOS from "aos";
import Swal from "sweetalert2";
import Swup from "swup";

import.meta.glob(["../fonts/**"]);

window.Alpine = Alpine;
window.Swal = Swal;

const swup = new Swup();

Alpine.start();

AOS.init();
