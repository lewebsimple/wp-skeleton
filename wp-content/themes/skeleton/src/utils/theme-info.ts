import { version } from "../../package.json";

export function logThemeInfo() {
  console.log(`Skeleton v${version} (${import.meta.env.MODE})`);
}
