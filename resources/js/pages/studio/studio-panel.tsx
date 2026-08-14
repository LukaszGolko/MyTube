
import StudioLayout from "@/layouts/studio-layout/studio-layout"

export const iframeHeight = "800px"

export const description = "A sidebar with a header and a search form."

interface LatestVideo {
  id: number;
  views_count: number;
  likes_count: number;
  created_at: string;
}

interface StudioPanelProps {
  latestVideo: LatestVideo | null;
}

export default function StudioPanel({ latestVideo }: StudioPanelProps) {
  return (
    <StudioLayout>
      <div className="flex gap-4 items-start">
        <div className="flex flex-col gap-4">
          <div className="rounded-lg border p-4">
            <p>Wynik najnowszego filmu Short</p>

          </div>
          <div className="rounded-lg border p-4">Item 2</div>
        </div>
        <div>
          <div className="rounded-lg border p-4">Item 3</div>
        </div>
      </div>
    </StudioLayout>
  );
}