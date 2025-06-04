import "./bootstrap";
import Alpine from "alpinejs";
import "@phosphor-icons/web/light";
import "@phosphor-icons/web/bold";
import "@phosphor-icons/web/fill";
import "@phosphor-icons/web/duotone";
import "@phosphor-icons/web/regular";
import AOS from 'aos';

import.meta.glob([
  '../fonts/**',
]);

window.Alpine = Alpine;

Alpine.start();

AOS.init();
