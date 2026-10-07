import i18n from "i18next";
import { initReactI18next } from "react-i18next";

import enCommon from "./locales/en/common.json";
import enStudio from "./locales/en/studio.json";
import enHome from "./locales/en/home.json";

import plCommon from "./locales/pl/common.json";
import plStudio from "./locales/pl/studio.json";
import plHome from "./locales/pl/home.json";


const resources = {
  en: {
    common: enCommon,
    studio: enStudio,
    home: enHome,
  },
  pl: {
    common: plCommon,
    studio: plStudio,
    home: plHome,
  },
}

  i18n.use(initReactI18next).init({
  resources,
  lng: "en",

  interpolation: {
      escapeValue: false
    }
  });

  export default i18n;