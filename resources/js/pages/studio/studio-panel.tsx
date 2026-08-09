
import  StudioLayout  from "@/layouts/studio-layout/studio-layout"

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
    return(
      <StudioLayout>

      </StudioLayout>
    );
}