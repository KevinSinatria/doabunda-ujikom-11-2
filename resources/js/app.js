import "./bootstrap";
import Alpine from "alpinejs";
import "@phosphor-icons/web/light";
import "@phosphor-icons/web/bold";

import.meta.glob([
  '../fonts/**',
]);

window.Alpine = Alpine;

Alpine.start();
