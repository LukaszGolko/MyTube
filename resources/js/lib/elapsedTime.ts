export function getElapsedTime(createdAt: string, now: Date = new Date()) {
  const diffMs = Math.max(0, now.getTime() - new Date(createdAt).getTime());

  const HOUR = 60 * 60 * 1000;
  const DAY = 24 * HOUR;

  return {
    days: Math.floor(diffMs / DAY),
    hours: Math.floor((diffMs % DAY) / HOUR),
  };
}